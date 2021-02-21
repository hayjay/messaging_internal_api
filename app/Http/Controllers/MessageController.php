<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Message, Author};
use App\Http\Resources\{MessageResource,AuthorResource};
use App\Http\Requests\StoreMessageRequest;

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
        
    }

    public function create()
    {
        $authors = $this->callApi([
            'endpoint' => 'api/authors/',
            'method' => 'GET'
        ], $this->request);

        $messages = $this->callApi([
            'endpoint' => 'api/message/all/',
            'method' => 'GET'
        ], $this->request);
        

        return view('index', compact('messages', 'authors'));
    }

    public function store(StoreMessageRequest $request)
    {
        try {
            $data = $request->validated();

            $reponse = $this->callApi([
                'endpoint' => 'api/message/store',
                'method' => 'POST',
            ], $request);

            if (isset($reponse) && !empty($reponse)) {
                return back()->with('success', 'Message created successfully!');
            }

            return back()->with('error', 'Something went wrong');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }
}
