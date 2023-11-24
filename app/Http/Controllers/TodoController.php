<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * トップ画面
     */
    public function index(Request $request)
    {
        // $search = session()->get("search");
        // $sort = session()->get("sort");
        // $query = Todo::query();

        // // フィルターとソートを同時に行うため
        // if ($search) session()->keep(['search']);
        // if ($sort) session()->keep(['sort']);

        // if ($search && !is_null($search["status"])) $query->where("status", $search["status"]);
        // if ($search && $search["title"]) $query->where("title", 'LIKE', '%' . $search["title"] . '%');
        // if ($search && $search["limit_at"]) $query->where("limit_at", $search["limit_at"]);
        // if ($sort && $sort["limit_at"]) $query->orderBy("limit_at", $sort["limit_at"]);

        // $todos = $query->get();
        return view("welcome");
        // return view("todos", compact("todos"));
    }

    /**
     * 新規作成
     */
    public function store(Request $request)
    {
        Todo::create([
            "title" => $request->title,
            "description" => $request->description,
            "limit_at" => $request->limit_at
        ]);

        return redirect()->route("index");
    }

    /**
     * 詳細画面の表示
     */
    public function edit(string $id)
    {
        $todo = Todo::find($id);
        return view("todo", compact("todo"));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, string $id)
    {
        Todo::where('id', $id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "limit_at" => $request->limit_at
        ]);

        return redirect()->route("edit", $id);
    }

    /**
     * 削除処理
     */
    public function destroy(string $id)
    {
        Todo::where("id", $id)->delete();

        return redirect()->route("index");
    }

    /**
     * フィルター処理
     */
    public function search(Request $request)
    {
        session()->forget('search');

        session()->flash("search", [
            "status" => $request->status,
            "title" => $request->title,
            "limit_at" => $request->limit_at
        ]);

        // ソートの入力値を維持
        $request->session()->keep(['sort']);

        return redirect()->route("index");
    }

    /**
     * ソート処理
     */
    public function sort(Request $request)
    {
        session()->forget('sort');
        session()->flash("sort", [
            "limit_at" => $request->limit_at
        ]);

        // フィルターの入力値を維持
        $request->session()->keep(['search']);

        return redirect()->route("index");
    }
}
