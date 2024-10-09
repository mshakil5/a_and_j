@extends('admin.layouts.admin')
@section('content')
<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
</style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Pages</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div id="addThisFormContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Pages</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="ermsg">
                                </div>
                                <div class="col-md-12">
                                  <div class="tile">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                        {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                        @csrf
                                        <div>
                                            <label for="caption">Caption</label>
                                            <input type="text" id="caption" name="caption" class="form-control">
                                        </div>
                                        <div>
                                            <label for="category_id">Category</label>
                                            <select  id="category_id" name="category_id" class="form-control">
                                                <option value="">Please Select</option>
                                                @foreach (\App\Models\GalleryCategory::orderby('id','DESC')->get() as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        
                                          
                                      </div>
                                      <div class="col-lg-6">
                                        <div>
                                            <label for="media">Image or Videos</label>
                                                <input id="media" class="form-control" multiple="" accept="image/gif, image/jpeg, image/png, video/mp4" name="media[]" type="file">
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <div class="preview2"></div>
                                            </div>
                                        </div>
                                            
                                      </div>
                                    </div>
                                    <div class="tile-footer">
                                        <hr>
                                        <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                        <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                        {!! Form::close() !!}
                                    </div>
                                  </div>
                                </div>
                              </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button id="newBtn" type="button" class="btn btn-info">Add New</button>
        <hr>
        <div id="contentContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> All Data</h3>
                        </div>
                        <div class="card-body">
                                <div class="container">
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                        <tr>
                                          <th style="text-align: center">ID</th>
                                          <th style="text-align: center">Caption</th>
                                          <th style="text-align: center">Image</th>
                                          <th style="text-align: center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($data as $key => $data)

                                              @php
                                                 $allowed = array('gif', 'png', 'jpg','JPG', 'jpeg', 'gif', 'svg');
                                                $filename = $data->image;
                                                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                
                                              @endphp
                                            <tr>
                                              <td style="text-align: center">{{ $key + 1 }}</td>
                                              <td style="text-align: center">{{$data->caption}}</td>
                                              
                                              @if (!in_array($ext, $allowed))
                                                <td>
                                                    <video width="320" height="240" controls>
                                                        <source src="{{asset('images/'.$data->image)}}" type="video/ogg">.
                                                    </video>
                                                </td>
                                              @else
                                              <td>
                                                @if ($data->image)
                                                  <img src="{{asset('images/'.$data->image)}}" height="120px" width="220px" alt="">
                                                  @endif
                                            </td>
                                              @endif
                                              
                                              <td style="text-align: center">
                                                {{-- <a id="EditBtn" rid="{{$data->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a> --}}
                                                <a id="deleteBtn" rid="{{$data->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                              </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.photo.modal') 
    </main>
@endsection
@section('script')
    <script>
        
var storedFiles2 = [];

        $(document).ready(function () {
            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                window.setTimeout(function(){location.reload()},100)
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                clearform();
            });
            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/admin/gallery')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {
                     
                    
                    var form_data = new FormData();
                    for(var i=0, len=storedFiles2.length; i<len; i++) {
                        form_data.append('media[]', storedFiles2[i]);
                    }
                    form_data.append("caption", $("#caption").val());
                    form_data.append("category_id", $("#category_id").val());
                    $.ajax({
                      url: url,
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data:form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                            success("Data Insert Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });
                }
                //create  end
                //Update
                if($(this).val() == 'Update'){
                     
                    var file_data = $('#image').prop('files')[0];
                    if(typeof file_data === 'undefined'){
                        file_data = 'null';
                    }
                    
                    var form_data = new FormData();
                    form_data.append('image', file_data);
                    form_data.append("caption", $("#caption").val());
                    form_data.append("category_id", $("#category_id").val());
                    form_data.append('_method', 'put');
                    $.ajax({
                        url:url+'/'+$("#codeid").val(),
                        type: "POST",
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data:form_data,
                        success: function(d){
                            console.log(d);
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                                pagetop();
                            }else if(d.status == 300){
                                success("Data Update Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error:function(d){
                            console.log(d);
                        }
                    });
                }
                //Update
            });
            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                //alert("btn work");
                codeid = $(this).attr('rid');
                //console.log($codeid);
                info_url = url + '/'+codeid+'/edit';
                //console.log($info_url);
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end
            //Delete 
            $("#contentContainer").on('click','#deleteBtn', function(){
                var dataid = $(this).attr('rid');
                var info_url = url + '/'+dataid;
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url:info_url,
                            method: "GET",
                            type: "DELETE",
                            data:{
                            },
                            success: function(d){
                                if(d.success) {
                                    swal("Deleted!", "Your imaginary file has been deleted.", "success");     
                                    location.reload();
                                }
                            },
                            error:function(d){
                                console.log(d);
                            }
                        });
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });
            //Delete  
            function populateForm(data){
                $("#category_id").val(data.category_id);
                $("#caption").val(data.caption);
                $("#codeid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }
            
        });

        /* WHEN YOU UPLOAD ONE OR MULTIPLE FILES */
        $(document).on('change','#media',function(){
            //$('.preview').html("");
            len_files = $("#media").prop("files").length;
            var construc = "<div class='row'>";
            for (var i = 0; i < len_files; i++) {
                var file_data2 = $("#media").prop("files")[i];
                storedFiles2.push(file_data2);
                //console.log(file_data);
                //form_data.append("media[]", file_data);
                //TODO: work on delete image btn in file upload
                construc += '<div class="col-3 singleImage my-3"><span data-file="'+file_data2.name+'" class="btn ' +
                    'btn-sm btn-danger imageremove2">&times;</span><img width="120px" height="auto" src="' +  window.URL.createObjectURL(file_data2) + '" alt="'  +  file_data2.name  + '" /></div>';
            }
            construc += "</div>";
            $('.preview2').append(construc);
        });

        $(".preview2").on('click','span.imageremove2',function(){
            //console.log($(this).next("img"));
            var trash = $(this).data("file");
            for(var i=0;i<storedFiles2.length;i++) {
                if(storedFiles2[i].name === trash) {
                    storedFiles2.splice(i,1);
                    break;
                }
            }
            $(this).parent().remove();

        });

        $(document).ready(function () {
                $('#example').DataTable();
            });

            $(document).ready(function () {
                $('#example2').DataTable();
            });
    </script>
      <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            swal("Copied!");
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#allgallery").addClass('active');
            $("#allgallery").addClass('is-expanded');
            $("#gallery").addClass('active');
        });
    </script>
@endsection
