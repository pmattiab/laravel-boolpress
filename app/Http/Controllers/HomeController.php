<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactUserAutoreply;
use App\Mail\NewContactAdminNotification;
use App\Lead;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("guest.home");
    }

    public function contacts()
    {
        return view("guest.contacts");
    }

    public function handleNewContact(Request $request)
    {
        $request->validate([
            "terms-conditions" => "required"
        ]);

        $form_data = $request->all();

        // salva i dati solo se l'utente accetta le finalità di marketing
        if(isset($form_data["marketing-terms-conditions"])) {
            $new_lead = new Lead();
            $new_lead->fill($form_data);
            $new_lead->save();
        }

        // risposta automatica sulla mail del cliente che ha mandato il messaggio
        Mail::to($form_data["email"])->send(new NewContactUserAutoreply());

        // mail all'admin che lo avvisa del messaggio del cliente con nome, email e messaggio
        Mail::to("mattia@mattia.it")->send(new NewContactAdminNotification($form_data));

        return redirect()->route("contacts-thankyou")->with("success", "Messaggio correttamente inviato");
    }

    public function contactsThankyou(Request $request)
    {
        return view("guest.contacts-thankyou");
    }
}