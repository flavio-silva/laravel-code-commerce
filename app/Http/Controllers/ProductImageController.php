<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use CodeCommerce\Http\Requests\ProductImageRequest;

class ProductImageController extends Controller
{
    /**
     * @var ProductImage
     */
    private $model;

    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }

    public function index($id, Product $product)
    {
        $images = $this->model->where(['product_id' => $id])->paginate(10);
        $product = $product->find($id);
        return view('product.image.index', compact('product', 'images'));
    }

    public function show($id)
    {
        $images = $this->model->findWhere(['product_id' => $id]);
        return view('product.image.show', compact('images'));
    }

    public function create($productId)
    {

        return view('product.image.create', compact('productId'));
    }

    public function store(ProductImageRequest $request, File $filesystem, Storage $storage)
    {
        $projectId = $request->route()->getParameter('id');
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $name = $file->getClientOriginalName();

        $image = $this->model->create([
            'product_id' => $projectId,
            'extension' => $extension,
            'name' => $name
        ]);

        $storage->disk('public_local')
            ->put("{$image->id}.{$extension}", $filesystem->get($file));

        return redirect()->route('product.image.index', ['id' => $projectId]);
    }

    public function destroy($id, Storage $storage)
    {
        $image = $this->model->find($id);
        $filename = public_path('uploads') . DIRECTORY_SEPARATOR ."{$image->id}.{$image->extension}";

        if(file_exists($filename)) {
            $storage->disk('public_local')->delete("{$image->id}.{$image->extension}");
        }

        $productId = $image->product->id;
        $image->delete();

        return redirect()->route('product.image.index', ['id' => $productId]);
    }

}
