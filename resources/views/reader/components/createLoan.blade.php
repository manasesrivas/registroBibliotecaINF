<section class="reader-modal">
    <div class="container-modal-reader">

        <div class="title-modal-row">
            <a href="{{ route('reader.index') }}">
                <svg class="back-button-modal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048"><path fill="white" d="M2048 1024H392l674 674l-144 145L0 922L922 0l144 145l-674 674h1656z"/></svg>
            </a>
            <h2 class="title-modal">
                Libros disponibles
            </h2>
        </div>
        <table class="table-modal-book">
            <tbody>
            @forelse ($libros as $libro)

            <tr class="row-modal">
                <td class="td-modal-book"> {{ $libro->id}} </td>
                <td class="td-modal-book"> {{ $libro->title}} </td>
                <td class="td-modal-book">
                    <form class="book-form" method="post" action="{{route('loan.store')}}">
                        @csrf
                        <input class="secret" type="text" name="book_id" value="{{ $libro->id }}">
                        <input class="secret" type="text" name="reader_id" value="{{ $id }}">
                        <button class="button-cta">prestar</button>
                    </form>    
                </td>
            </tr>

                
            @empty
                
            <p class="error">no hay libros disponibles</p>
 
            @endforelse
            </tbody>
        </table>
        
        
    </div>
</section>
