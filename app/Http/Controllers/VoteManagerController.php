<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Inani\Larapoll\Guest;
use Inani\Larapoll\Poll;

class VoteManagerController extends Controller
{
    /**
     * Make a Vote
     *
     * @param Poll $poll
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function vote($id, Request $request)
    {   
        $poll = Poll::find($id);
        try {
            $vote = $this->resolveVoter($request, $poll)
                ->poll($poll)
                ->vote($request->get('options'));
            if ($vote) {
                return back()->with('success', 'Vote Done');
            }
        } catch (Exception $e) {
            return back()->with('errors', collect($e->getMessage()));
        }
    }

    /**
     * Get the instance of the voter
     *
     * @param Request $request
     * @param Poll $poll
     * @return Guest|mixed
     */
    protected function resolveVoter(Request $request,$id)
    {
        $poll = Poll::find($id);
        if ($poll->canGuestVote()) {
            return new Guest($request);
        }
        return $request->user(config('admin_guard'));
    }

}
