<tr class="row">
    <td class="content-list">{{$id}}</td>
    <td class="content-list">{{$titulo}}</td>
    <td class="content-list">{{$editorial}}</td>
    <td class="content-list">{{$autor}}</td>
    <td class="content-list">{{$edicion}}</td>
    @if ($disponible)
        <td class="content-list">
        <span class="libro-disponible">Disponible</span>
        </td>
        <td class="content-list">
            <div class="center-items">
                <a href="{{ route('book.show', $id)}}" class="ctaImg">
                    <img src="{{ asset('assets/img/details.svg')}}" alt="" srcset="">
                </a>
            </div>
        </td>

        
    @else
        
    <td class="content-list">
        <span class="error">No disponible</span>
    </td>
    <td class="content-list">
        <div class="center-items">
            <a href="{{ route('book.show', $id)}}" class="ctaImg">
                <img src="{{ asset('assets/img/details.svg')}}" alt="" srcset="">
            </a>
        </div>
    </td>
    @endif
</tr>