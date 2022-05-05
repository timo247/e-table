@extends('template')
@section('contenu')

<ul class="consommationsList">
    <li class="consommation">
        <em><span class="nom">nom</span> <br/></em>
        <span class="prix">prix</span>
    </li>
</ul>



@endsection

<script type="module">

    async function getConsos(){
    let response = await fetch('/api/consommations', {credentials: 'include'});
    console.log(response)
    let consos =  await response.json();
    console.log(consos.data)
    return consos.data
    }

    
    async function displayConsos(){
        let consos = await getConsos();

        consos.forEach(conso => {
            const newConso = document.querySelector('.consommation').cloneNode(true)
            newConso.querySelector('.nom').textContent = conso.nom
            newConso.querySelector('.prix').textContent = conso.prix

            const list = document.querySelector('.consommationsList')
            list.append(newConso)
        })
    }

    await displayConsos()



</script>