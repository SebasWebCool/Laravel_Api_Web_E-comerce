@extends('layouts.app')

@section('template_title')
    Sock
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sock') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('socks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
										<th>Color</th>
										<th>Size</th>
										<th>Sku</th>
										<th>Image</th>
										<th>Stock</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($socks as $sock)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sock->name }}</td>
											<td>{{ $sock->description }}</td>
											<td>{{ $sock->price }}</td>
											<td>{{ $sock->color }}</td>
											<td>{{ $sock->size }}</td>
											<td>{{ $sock->sku }}</td> 
											<td>{{ $sock->image }}
                                                {{-- <img src="{{asset("storage/".$sock->image)}}" alt="hola"> --}}
                                            </td>

											<td>{{ $sock->stock }}</td>

                                            <td>
                                                <form action="{{ route('socks.destroy',$sock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('socks.show',$sock->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('socks.edit',$sock->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    <a class="btn btn-sm btn-info text-white" target="_blank" href="{{asset("storage/".$sock->image)}}" ><i class="fa fa-fw fa-edit "></i> Show Image</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $socks->links() !!}
            </div>
        </div>
    </div>
@endsection
