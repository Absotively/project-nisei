<?php

namespace App\Http\Controllers\Admin;

use App\ProductFile;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProductFilesController extends Controller
{
    /**
     * Display a listing of ProductFile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('product_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('product_delete')) {
                return abort(401);
            }
            $product_files = ProductFile::onlyTrashed()->get();
        } else {
            $product_files = ProductFile::all();
        }

        return view('admin.product_files.index', compact('product_files'));
    }

    /**
     * Show the form for creating new product_file.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('product_edit')) {
            return abort(401);
        }
        
        $products = \App\Product::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.product_files.create', compact('products'));
    }

    /**
     * Store a newly created ProductFile in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('product_edit')) {
            return abort(401);
        }
        $product_file = ProductFile::create($request->all());

        return redirect()->route('admin.product_files.index');
    }


    /**
     * Show the form for editing ProductFile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('product_edit')) {
            return abort(401);
        }
        
        $products = \App\Product::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $product_file = ProductFile::findOrFail($id);

        return view('admin.product_files.edit', compact('product_file', 'products'));
    }

    /**
     * Update product_file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('product_edit')) {
            return abort(401);
        }

        $product_file = ProductFile::findOrFail($id);
        $product_file->update($request->all());

        return redirect()->route('admin.product_files.index');
    }
    
    
    /**
     * Display product_file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('product_view')) {
            return abort(401);
        }
        $product_file = ProductFile::findOrFail($id);

        return view('admin.product_files.show', compact('product_file'));
    }


    /**
     * Remove ProductFile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('product_delete')) {
            return abort(401);
        }
        $product_file = ProductFile::findOrFail($id);
        $product_file->delete();

        return redirect()->route('admin.product_files.index');
    }

    /**
     * Delete all selected ProductFile at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('product_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ProductFile::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ProductFile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('product_delete')) {
            return abort(401);
        }
        $product_file = ProductFile::onlyTrashed()->findOrFail($id);
        $product_file->restore();

        return redirect()->route('admin.product_files.index');
    }

    /**
     * Permanently delete ProductFile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('product_file_delete')) {
            return abort(401);
        }
        $product_file = ProductFile::onlyTrashed()->findOrFail($id);
        $product_file->forceDelete();

        return redirect()->route('admin.product_files.index');
    }
    
    
    public function testDownload(Request $request, $id)
    {
	if(! Gate::allows('product_view')) {
	    return abort(401);
	}
	
	$product_file = ProductFile::findOrFail($id);
	return Storage::disk('protected')->download($product_file->filename);	
    }
}
