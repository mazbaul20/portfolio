<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"><ion-icon name="home-outline"></ion-icon></a>
                </li>
            <li class="breadcrumb-item active" aria-current="page">Hero Section</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<!--start datatable-->
<div class="d-flex">
    <h6 class="mt-3 mb-0 text-uppercase">Hero Section</h6>
    
    <div class="ms-auto">
        <button type="button"data-bs-toggle="modal" data-bs-target="#homeSliderCreate" class="btn btn-primary">Create</button>
    </div>
</div>

<hr/>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tableData" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Slider Image</th>
                        <th>Title</th>
                        <th>SubTitle one</th>
                        <th>SubTitle two</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--end datatable-->

<script>
    getList();
    async function getList(){
        showLoader();
        const res = await axios.get('/list-herosection');
        hideLoader();
        
        let tableList = $('#tableList');
        let tableData = $('#tableData');

        tableData.DataTable().destroy();
        tableList.empty();
        
        res.data.forEach(function(item,index){
            let row=(`
                <tr>
                    <td>${index+1}</td>
                    <td>
                        <img style="width:60px; height:60px;" src="${item['imageUrl']}" alt="">
                    </td>
                    <td>${item['title']}</td>
                    <td>${item['subTitle1']}</td>
                    <td>${item['subTitle2']}</td>
                    <td>
                        <a data-path="${item['imageUrl']}" data-id="${item['id']}" style="padding:0px" class="btn editBtn"><span class="material-symbols-outlined">edit_square</span></a>
                        <a data-path="${item['imageUrl']}" data-id="${item['id']}" style="padding:0px" class="btn deleteBtn"><span class="material-symbols-outlined">delete</span></a>
                    </td>
                </tr>
            `)
            tableList.append(row)
        });

        $('.editBtn').on('click',async function(){
            let id=$(this).data('id');
            let filePath=$(this).data('path');
            $('#update-homeslider').modal('show');
            await FillUpUpdateFormHomeSlider(id,filePath);
        });
        
        $('.deleteBtn').on('click',function(){
            let id=$(this).data('id');
            let file_path=$(this).data('path');

            $('#delete-modal').modal('show');
            $('#deleteID').val(id);
            $('#file_path').val(file_path);
        });
        
        tableData.DataTable({
            order:[[0,'asc']],
            lengthMenu:[5,10,15,20]
        });
    }
</script>