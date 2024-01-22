<div class="modal fade" id="update-homeslider" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="update-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" id="titleUpdate" placeholder="Enter your title">
                            
                            <label class="form-label mt-2">Sub Title1</label>
                            <input type="text" class="form-control" id="subTitle1Update" placeholder="Enter your sub title 1">
                            
                            <label class="form-label mt-2">Sub Title2</label>
                            <input type="text" class="form-control" id="subTitle2Update" placeholder="Enter your sub title 2">
                            
                            <br/>
                            <img  class="w-25" id="oldImg" src="{{asset('backend/assets/images/default.jpg')}}">
                            <br/>

                            <label class="form-label mt-2">Image Url</label>
                            <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" id="imageUrlupdate" type="file" class="form-control">
                            
                            <input class="d-none" id="updateID">
                            <input class="d-none" id="filePath"/>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
          <button id="update-modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="Update()" id="update-btn" type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

<script>
    async function FillUpUpdateFormHomeSlider(id,filePath){
        $('#updateID').val(id);
        $('#filePath').val(filePath);
        
        $('#oldImg').attr('src', filePath);

        showLoader();
        let res = await axios.post('/herosection-by-id',{id:id});
        hideLoader();
        
        $('#titleUpdate').val(res.data['title']);
        $('#subTitle1Update').val(res.data['subTitle1']);
        $('#subTitle2Update').val(res.data['subTitle2']);
        // $('#imageUrlupdate').val(res.data['imageUrl']);
    }

    async function Update(){
        let id=$('#updateID').val();
        let filePath=$('#filePath').val();

        let titleUpdate=$('#titleUpdate').val();
        let subTitle1Update=$('#subTitle1Update').val();
        let subTitle2Update=$('#subTitle2Update').val();
        let imageUrlupdate=$('#imageUrlupdate')[0].files[0];

        if(titleUpdate.length===0){
            errorToast("Hero section title is Required!")
        }else if(subTitle1Update.length===0){
            errorToast("Hero section subtitle1 is Required!")
        }else if(subTitle2Update.length===0){
            errorToast("Hero section subtitle2 is Required!")
        }else{
            $('#update-modal-close').click();

            let formData = new FormData();
            formData.append('title',titleUpdate);
            formData.append('subTitle1',subTitle1Update);
            formData.append('subTitle2',subTitle2Update);
            formData.append('imageUrl',imageUrlupdate);
            formData.append('id',id);
            formData.append('file_path',filePath);

            const config = {
                headers: {
                    'content-type':'multipart/form-data'
                }
            }

            showLoader();
            const res = await axios.post("/update-herosection",formData,config);
            hideLoader();
            if(res.status===200 && res.data===1){
                successToast('Hero section updated successful');
                $('#update-form').trigger('reset');
                await getList();
            }else{
                errorToast("Request fail!");
            }
        }
    }
</script>