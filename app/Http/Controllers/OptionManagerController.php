<?php

namespace  App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Inani\Larapoll\Helpers\PollHandler;
use Inani\Larapoll\Http\Request\AddOptionsRequest;
use Inani\Larapoll\Poll;

class OptionManagerController extends Controller
{
    /**
     * Add new options to the poll
     *
     * @param Poll $poll
     * @param AddOptionsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($id, AddOptionsRequest $request)
    {
        // $this->authorize('edit', $poll);
        $poll = Poll::find($id);
        $poll->attach($request->get('options'));

        return redirect('admin/polls/_list')
            ->with('thongbao', 'Thêm phương án thành công');
    }

    /**
     * Remove the Selected Option
     *
     * @param Poll $poll
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id, Request $request)
    {
        // $this->authorize('edit', $poll);
        $poll = Poll::find($id);
        try{
            $poll->detach($request->get('options'));

            return redirect('admin/polls/_list')
                ->with('thongbao', 'Xóa phương án thành công');
        }catch (Exception $e){
            return back()->withErrors(PollHandler::getMessage($e));
        }
    }

    /**
     * Page to add new options
     *
     * @param Poll $poll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function push($id)
    {
        // $this->authorize('edit', $poll);
        $poll = Poll::find($id);
        return view('admin.polls.options.push', compact('poll'));
    }

    /**
     * Page to delete Options
     *
     * @param Poll $poll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        // $this->authorize('edit', $poll);
        $poll = Poll::find($id);
        return view('admin.polls.options.remove', compact('poll'));
    }
}