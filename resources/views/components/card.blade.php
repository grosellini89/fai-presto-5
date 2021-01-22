{{-- Il componente modellizzato classizzato va sempre in un div --}}

<div class="card-product p-3 position-relative mx-auto mb-3">
    <div class="row">
        <div class="col-12 col-md-8 ">                        
            <a class="text-decoration-none d-none d-md-block" href="{{ route('announcement.show', ['id'=>$announcement->id]) }}"><p id="name" class="h2 text-primary-color product-name mb-0 ">{{$announcement->title}}</p></a>
            <a class="text-decoration-none d-block d-md-none " href="{{ route('announcement.show', ['id'=>$announcement->id]) }}"><p id="name" class="h2 text-primary-color product-name mb-0 ">{{Str::limit($announcement->title,14)}}</p></a>
            <p id="category" class="pt-2"><a class="text-decoration-none" href="{{ route('filtercategory', ['name'=>$announcement->category->name, 'id'=>$announcement->category->id]) }}">{{ $announcement->category->name }}</a><span class="small float-right">{{ $announcement->createdAt }}</span></p>
            <p id="body" class="lead product-name mb-0 ">{{Str::limit($announcement->body,100)}}</p>      
           
            <div class="card-footer mt-5 justify-content-between">     
                <p id="price" class="h4 text-main mb-0 product-price">{{ $announcement->price }} € <span class="float-right"><button class="condividi">
                    <div class="links">
                        <a href="" class="condividi_box">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="condividi_box">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="" class="condividi_box">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                   <span><i class="fas fa-share-square text-primary-color"></i></span>
                </button></span></p>
            </div>
        </div>
        <div class="col-12 col-md-4 ">
            @if(count($announcement->images)>0)
                <img class="img-announcement img-fluid " src="{{ $announcement->images->first()->getUrl(300,300)}}" alt="">
            @else 
                <img class="img-announcement img-fluid " src="https://picsum.photos/300/300" alt="">
            @endif
        </div>
    </div>
</div>