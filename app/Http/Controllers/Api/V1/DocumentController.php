<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\History;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DocumentStoreRequest;

class DocumentController extends Controller
{
    public function create($team_id)
    {
        $validator = \Validator::make(\Request::all(),
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
        $input = [
            'title' => 'hoge',
            'body'  => 'hogegege',
        ];
        $document = Document::create([
            'team_id' => $team_id,
            'title'   => \Request::get('title'),
            'body'    => \Request::get('body'),
        ]);
        $history = History::create([
            'document_id' => $document->id,
            'user_id'     => \Auth::user()->id,
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
