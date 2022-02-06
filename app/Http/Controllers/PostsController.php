<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Posts',
            'data' => $posts
        ],200);
    }

    public function store(Request $request){
        //validate data
        $validator = Validator::make($request->all(),[
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Masukkan Judul Post!',
                'content.required' => 'Masukkan Konten Post!',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Silahkan isi bidang yang kosong!',
                'data' => $validator->errors()
            ],400);
        } else{
            $post = Post::create([
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);

            if($post){
                return response()->json([
                    'success' => true,
                    'message' => 'Post berhasil disimpan!',
                ], 200);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'Post gagal disimpan!',
                ], 400);
            }
        }
    }

    public function show($id){
        $post = Post::whereId($id)->first();
        if($post){
            return response()->json([
                'success' => true,
                'message' => 'Detail post',
                'data' => $post
            ],200);
        } else{
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan!',
                'data' => $post
            ],404);
        }
    }

    public function update(Request $request){
        //validate data
        $validator = Validator::make($request->all(),[
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Masukkan Judul Post!',
                'content.required' => 'Masukkan Konten Post!',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Silahkan isi bidang yang kosong!',
                'data' => $validator->errors()
            ],400);
        } else{
            $post = Post::whereId($request->input('id'))->update([
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);

            if($post){
                return response()->json([
                    'success' => true,
                    'message' => 'Post berhasil diupdate!',
                ],200);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'Post gagal diupdate!',
                ],500);
            }
        }
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        if($post){
            return response()->json([
                'success' => true,
                'message' => 'Post berhasil dihapus!',
            ],200);
        } else{
            return response()->json([
                'success' => false,
                'message' => 'Post gagal dihapus!',
            ],500);
        }
    }
}
