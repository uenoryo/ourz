<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\History;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DocumentStoreRequest;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($team_id)
    {
        $input = \Request::only(['title', 'body']);
        $validator = \Validator::make($input,
            [
                'title' => 'required|max:40',
                'body'  => 'required',
            ],
            [
                'title.required' => 'タイトルは必須項目です',
                'title.max'      => 'タイトルは40文字以内に設定してください',
                'body.required'  => '内容は必須項目です',
            ]
        );
        if ($validator->fails()) {
            return \Response::json([
                'status'   => 'Bad Request',
                'messages' => $validator->messages(),
            ]);
        }
        $document = Document::create([
            'team_id' => $team_id,
            'title'   => $input['title'],
            'body'    => $input['body'],
        ]);
        $history = History::create([
            'document_id' => $document->id,
            'member_id'   => \Auth::user()->id,
        ]);
        return \Response::json([
            'status' => 'OK',
            'data'   => [
                'document' => $document,
                'history'  => $history,
            ],
        ]);
    }

    public function update($team_id)
    {
        $input = \Request::only(['id', 'body', 'title']);
        $validator = \Validator::make($input,
            [
                'id'    => 'required|exists:documents,id',
                'title' => 'required|max:40',
                'body'  => 'required',
            ],
            [
                'id.required'    => 'IDは必須項目です',
                'id.exists'      => '指定されたIDは存在しません',
                'title.required' => 'タイトルは必須項目です',
                'title.max'      => 'タイトルは40文字以内に設定してください',
                'body.required'  => '内容は必須項目です',
            ]
        );
        if ($validator->fails()) {
            return \Response::json([
                'status'   => 'Bad Request',
                'messages' => $validator->messages(),
            ]);
        }
        $document = Document::find($input['id']);
        $document->title = $input['title'];
        $document->body  = $input['body'];
        $document->save();
        $history = History::create([
            'document_id' => $document->id,
            'member_id'   => \Auth::user()->id,
        ]);
        return \Response::json([
            'status' => 'OK',
            'data'   => [
                'document' => $document,
                'history'  => $history,
            ],
        ]);
    }
}
