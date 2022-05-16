<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function getAllItems(){
        $item =  Item::all();
        if(isset($item)){
            $respond = [
                'status' => 201,
                'message' => 'All Items',
                'data' => $item,
            ];
        }else{
            $respond = [
                'status' => 403,
                'message' => 'No items found',
            ];
        }

        return $respond;
    }

    public function getItemById($id){
        return Item::find($id);
    }

    public function createItem(Request $request){
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = $request->image;
        $item->save();
        return $respond = ([
            'status' => 201,
            'message' => 'Item added'
        ]);
    }

    public function deleteItem(Request $request, $id){
        $item = Item::find($id);
        if(isset($item)){
           $item->delete();
           $respond = [
                'status' => 201,
                'message' => 'Item deleted successfully',
                'data' => $item,
           ];
        }
        else{
            $respond = [
                'status' => 403,
                'message' => 'Item not found',
            ];
        }

        return $respond;
    }

    public function updateItem(Request $request, $id){
        $item = Item::find($id);
        if(isset($item)){
            $item->name = $request->name;
            $item->price = $request->price;
            $item->description = $request->description;
            $item->image = $request->image;
            $item->save();

            $respond = [
                'status' => 201,
                'message' => 'Item updated successfully',
                'data' => $item,
            ];
        }
        else{
            $respond = [
                'status' => 403,
                'message' => 'Item not found',
            ];
        }

        return $respond;
    }
}
