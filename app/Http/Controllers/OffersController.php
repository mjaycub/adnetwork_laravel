<?php namespace App\Http\Controllers;
use App\User;
use App\Offer;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use View;
use Redirect;


class OffersController extends Controller
{
    /**
     * Show all of the message threads to the user
     *
     * @return mixed
     */
    public function index()
    {
        // will be used for listing all offers maybe ?
    }

    /**
     * Stores a new offer
	 * @param $threadId
     *
     * @return mixed
     */
    public function store($threadId)
    {
    	/* OFFER FORMAT:

            Offer::create(
                [
                    'title' => "Test",
                    'advertiser_id'   => Auth::user()->id,
                    'creator_id'    => Auth::user()->id,
                    'currency' => "USD",
                    'amount' => 10000,
                    'description' => "Test descrip",
                    'status' => 1
                ]
            );
            */

		try {
            $thread = Thread::findOrFail($threadId);
        } catch (ModelNotFoundException $e) {
            Session::flash('message', 'The thread with ID: ' . $threadId . ' was not found.');
			Session::flash('alert-class', 'alert-warning'); 
            return redirect('messages');
        }

		// HARD CODED - assuming only two participants for now
        $participants = $thread->participantsUserIds();

		$user0 = User::whereId($participants[0])->firstOrFail();
		$user1 = User::whereId($participants[1])->firstOrFail();

        if ($user0->hasRole("brand")) {
        	$advertiser_id = $user0->id;
        	$creator_id = $user1->id;
        } else if ($user1->hasRole("brand")) {
        	$creator_id = $user0;
        	$advertiser_id = $user1;
        } else {
        	Session::flash('message', 'ERROR: brand/creator roles incorrect.');
        	Session::flash('alert-class', 'alert-warning'); 
            return redirect('messages');
        }


        $input = Input::all();
        $offer = Offer::create(
            [
                'title' => $input['title'],
                'advertiser_id'   => $advertiser_id,
                'creator_id'    => $creator_id,
                'currency' => $input['currency'],
                'amount' => $input['amount'],
                'description' => $input['description'],
                'status' => 1 // REMOVE THIS - USING RELATION INSTEAD
            ]
        );

        $offer->assignStatus(2); // assign 'Proposal' status 
        $offer->save();

        return redirect('inbox');
    }

}