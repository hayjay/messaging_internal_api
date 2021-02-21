<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Message, Author};
use App\Http\Resources\{MessageResource,AuthorResource};
use App\Http\Requests\Admin\StoreMessageRequest;

class MessageController extends Controller
{
	protected $request;
	protected $message;
    protected $author;

    public function __construct(Request $request, Message $message, Author $author)
    {
    	$this->request = $request;
    	$this->message = $message;
        $this->author = $author;
    }

    public function index()
    {
    	return MessageResource::collection(Message::with('author')->get());
    }

    public function create()
    {
        $authors = $this->callApi([
            'endpoint' => 'api/authors/',
            'method' => 'GET'
        ]);
        return view('index', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $this->request->all();
        $response = $this->message->create($data);
        return new MessageResource($response);
    }
}
