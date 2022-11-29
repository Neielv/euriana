<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\This;

class PedidosMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subjet="Nuevo Pedido";
    public $vendedor;
    public $cliente;
    public $total;
    public $Codigo;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($codigo,$cliente,$vendedor,$total)
    {
        $this->codigo=$codigo;
        $this->cliente=$cliente;
        $this->vendedor=$vendedor;
        $this->total=$total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('emails.NuevaOrden')->with([
           'vendedor:'=>$this->vendedor,
           'cliente:'=>$this->cliente,
           'total:'=>$this->total,
           'codigo'=>$this->codigo,
       ]);
      
       
    
    }
}
