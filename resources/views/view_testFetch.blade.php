@extends('template')
@section('contenu')

<ul>
    <li class="consommation">
        <span>nom</span>
        <prix>prix</span>
    </li>
</ul>



@endsection

<script type="module">

    async function getConsos(){
    let response = await fetch('/api/consommations', {credentials: 'include'});
    console.log(response)
    let consos =  await response.json();
    console.log(consos);
    }

    await getConsos();

</script>