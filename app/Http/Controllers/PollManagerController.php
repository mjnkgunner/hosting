<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inani\Larapoll\Helpers\PollHandler;
use Inani\Larapoll\Http\Request\PollCreationRequest;
use Inani\Larapoll\Poll;

class PollManagerController extends Controller
{
    /**
     * Dashboard Home
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    /**
     * Show all the Polls in the database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // $this->authorize('create', Poll::class);

        $polls = Poll::withCount('options', 'votes')->latest()->paginate(
            config('larapoll_config.pagination')
        );

        return view('admin.polls._list', compact('polls'));
    }

    /**
     * Store the Request
     *
     * @param PollCreationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Inani\Larapoll\Exceptions\CheckedOptionsException
     * @throws \Inani\Larapoll\Exceptions\OptionsInvalidNumberProvidedException
     * @throws \Inani\Larapoll\Exceptions\OptionsNotProvidedException
     */
    public function store(PollCreationRequest $request)
    {
        // $this->authorize('store', Poll::class);

        try {
            PollHandler::createFromRequest($request->all());
        } catch (DuplicatedOptionsException $exception) {
            return redirect(route('poll.create'))
                ->withInput($request->all())
                ->with('danger', $exception->getMessage());
        }

        return redirect('admin/polls/_list')
            ->with('thongbao', 'Khảo sát được tạo thành công');
    }

    /**
     * Show the poll to be prepared to edit
     *
     * @param Poll $poll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // $this->authorize('edit', $poll);
        $poll = Poll::find($id);
        return view('admin.polls.edit', compact('poll'));
    }

    /**
     * Update the Poll
     *
     * @param Poll $poll
     * @param PollCreationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PollCreationRequest $request)
    {
        // $this->authorize('update', $poll);
        $poll = Poll::find($id);
        PollHandler::modify($poll, $request->all());

        return redirect('admin/polls/_list')
            ->with('success', 'Khảo sát được cập nhật thành công');
    }

    /**
     * Delete a Poll
     *
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        // $this->authorize('delete', $poll);
        $poll = Poll::find($id);
        $poll->remove();

        return redirect('admin/polls/_list')
            ->with('thongbao', 'Khảo sát được xóa thành công');
    }

    public function create()
    {
        // $this->authorize('create', Poll::class);

        return view('admin.polls.create');
    }

    /**
     * Lock a Poll
     *
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lock($id)
    {
        // $this->authorize('lock', $poll);
        $poll = Poll::find($id);
        $poll->lock();

        return redirect('admin/polls/_list')
            ->with('thongbao', 'Khảo sát được đóng thành công');
    }

    /**
     * Unlock a Poll
     *
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlock($id)
    {
        // $this->authorize('lock', $poll);
        $poll = Poll::find($id);
        Poll::whereNull('isClosed')->update(['isClosed' => now()]);

        $poll->unLock();

        return redirect('admin/polls/_list')
            ->with('thongbao', 'Khảo sát được mở thành công');
    }

    public function result($id)
    {
        // $this->authorize('create', Poll::class);
        $poll = Poll::find($id);
        return view('admin.polls.result', compact('poll'));
    }

}