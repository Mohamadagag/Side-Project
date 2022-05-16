<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAllCategories(){
        return Category::all();
    }

    public function getCategoryById($id){
        return Category::find($id);
    }

    public function createCategory(Request $request){
            $category = new Category();
            $category->name = $request->name;
            $category->image = $request->image;
            $category->save();
            return $category;
    }

    public function deleteCategory($id){
      $category = Category::find($id);
      if(isset($category)){
          $category->delete();

          $respond = [
              'status' => 201,
              'message' => 'Deleted successfully',
              'data' => $category,
          ];
      }
      else {
          $respond = [
            'status' => 403,
            'message' => 'Category not found',
          ];
      }

      return $respond;
    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id);

        if(isset($category)){
            $category->name = $request->name;
            $category->image = $request->image;
            $category->save();

            $respond = [
                'status' => 201,
                'message' => 'Updated successfully',
                'data' => $category,
            ];
        }
        else{
            $respond = [
                'status' => '403',
                'message' => 'Category not found',
            ];
        }

        return $respond;
    }
}
