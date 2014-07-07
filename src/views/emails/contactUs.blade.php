



<div>
    <h2>De: <small>{{$name}} </small></h2>


	@if(isset($empresa))
    <p>Empresa: {{$empresa}}</p>
	@endif
    <p>Email: {{$email}}</p>
    <p> Telefone:{{$tel}}</p>


    <h4>Mensagem</h4>
    <p>{{$messageInput}}</p>

</div>
