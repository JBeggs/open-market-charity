
  <x-slot name="header">

        <style>
        
          .title{
              margin-bottom: 5vh;
          }
          .card{
              margin: auto;
              max-width: 950px;
              width: 90%;
              box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              border-radius: 1rem;
              border: transparent;
          }
          @media(max-width:767px){
              .card{
                  margin: 3vh auto;
              }
          }
          .cart{
              background-color: #fff;
              padding: 4vh 5vh;
              border-bottom-left-radius: 1rem;
              border-top-left-radius: 1rem;
          }
          @media(max-width:767px){
              .cart{
                  padding: 4vh;
                  border-bottom-left-radius: unset;
                  border-top-right-radius: 1rem;
              }
          }
          .summary{
              background-color: #ddd;
              border-top-right-radius: 1rem;
              border-bottom-right-radius: 1rem;
              padding: 4vh;
              color: rgb(65, 65, 65);
          }
          @media(max-width:767px){
              .summary{
              border-top-right-radius: unset;
              border-bottom-left-radius: 1rem;
              }
          }
          .summary .col-2{
              padding: 0;
          }
          .summary .col-10
          {
              padding: 0;
          }.row{
              margin: 0;
          }
          .title b{
              font-size: 1.5rem;
          }
          .main{
              margin: 0;
              padding: 2vh 0;
              width: 100%;
          }
          .col-2, .col{
              padding: 0 1vh;
          }
          a{
              padding: 0 1vh;
          }
          .close{
              margin-left: auto;
              font-size: 0.7rem;
          }
          img{
              width: 3.5rem;
          }
          .back-to-shop{
              margin-top: 4.5rem;
          }
          h5{
              margin-top: 4vh;
          }
          hr{
              margin-top: 1.25rem;
          }
          form{
              padding: 2vh 0;
          }
          select{
              border: 1px solid rgba(0, 0, 0, 0.137);
              padding: 1.5vh 1vh;
              margin-bottom: 4vh;
              outline: none;
              width: 100%;
              background-color: rgb(247, 247, 247);
          }
          input{
              border: 1px solid rgba(0, 0, 0, 0.137);
              padding: 1vh;
              margin-bottom: 4vh;
              outline: none;
              width: 100%;
              background-color: rgb(247, 247, 247);
          }
          input:focus::-webkit-input-placeholder
          {
                color:transparent;
          }


                  </style>
         <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted">{{count($cartItems) }} items</div>
                        </div>
                    </div>
                    @foreach ($cartItems as $item)
        

                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{ $item->attributes->image }}"></div>
                              <div class="col">
                                <div class="row">{{ $item->name }}</div>
                            </div>
                            <div class="col">
                              <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $item->id}}" >
                                <input type="text" name="quantity" value="{{ $item->quantity }}" 
                                class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">Update</button>
                                </form>
                              </div>
                            </div>
                            <div class="col">
                              <div class="row">
     
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right"> Total: ${{ Cart::getTotal() }}</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select><option class="text-muted">Standard-Delivery- R100.00</option></select>
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right"> Total: R{{ Cart::getTotal() }}</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                    <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Clear Carts</button>
                          </form>
                </div>
            </div>



      
        </main>
