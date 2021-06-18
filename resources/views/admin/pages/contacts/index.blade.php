@extends('admin.layouts.master')

@section('title', 'Contacts')

@section('sub_title', 'Contacts')

@section('content')

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">@yield('title')</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">@yield('title')</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Scroll - horizontal table -->
        <section id="horizontal">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">All Contacts</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table display nowrap table-striped table-bordered scroll-horizontal w-100" id="dtTable">
                      <thead class="w-100" style="width: 100%">
                        <tr>
                          <th class="sorting_desc">#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Message</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($contacts))
                          @foreach ($contacts as $contact)
                            <tr id="{{ $contact->status ? null : $contact->id  }}" class="{{ $contact->status ? '' : 'bg-light' }}" onclick="tableRowClick({{ $contact->status ? null : $contact->id  }})">
                              <a href="{{ route('howDoesItWork') }}">
                              <td class="align-middle">{{ $contact->id ?? ''}}</td>
                              <td class="align-middle">{{ $contact->name ?? ''}}</td>
                              <td class="align-middle">{{ $contact->email ?? '' }}</td>
                              <td class="align-middle">{{ (substr(($contact->message !='' ? ucfirst($contact->message) : ''),0,100)).'. . .' }}</td>
                              <td class="align-middle">{{ $contact->created_at->format('d-M-y') ?? ''}}</td>
                              <td class="align-middle d-flex">
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                  @method('DELETE')
                                  <button type="submit"  href="" class="btn btn-danger"><i class="la la-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          </a>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
    
@endsection

@section('scripts')

  <script>
    $.fn.dataTableExt.sErrMode = 'none';
    $('#dtTable').DataTable({
        sorting:false,
        "sScrollX": '100%',
    })

    function tableRowClick(id) {
      if (id!='' && id!=null) {
        var readContact = '{{ route("contacts.readContact", "row") }}';
        readContact = readContact.replace("row", id);
        $.ajax({
            type: "get",
            url: `${readContact}`,
            success: function(response) {
                if (response != '' && response.status == true) {
                  toastr.info(`${response.message}`);
                  document.getElementById(`${id}`).classList.remove("bg-light");
                }else{
                  toastr.error(`${response.message}`);
                }
            }
        });
      }else{
        toastr.success(`This row is already read by admin!`);
      }
    }
  </script>
    
@endsection
