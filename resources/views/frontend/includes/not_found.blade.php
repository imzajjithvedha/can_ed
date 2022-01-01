<div class="row justify-content-center border p-5">
    <div class="col-12 text-center">
        <img src="{{ url('img/frontend/no_data.png') }}" alt="" class="img-fluid">
        <h3 class="mt-5 mb-2">{{$not_found_title}}</h3>
        <p class="gray mb-2">{{$not_found_description}}</p>
        <a href={{ $url }} class="btn text-white border-0" style="background-image: linear-gradient(to bottom, #CF0411, #660000);">{{$not_found_button_caption}}</a>
    </div>
</div>