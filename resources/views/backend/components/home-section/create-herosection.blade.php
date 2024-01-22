<div class="modal fade" id="homeSliderCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Home Section</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="save-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter your title">
                            
                            <label class="form-label mt-2">Sub Title1</label>
                            <input type="text" class="form-control" id="subTitle1" placeholder="Enter your sub title 1">
                            
                            <label class="form-label mt-2">Sub Title2</label>
                            <input type="text" class="form-control" id="subTitle2" placeholder="Enter your sub title 2">
                            
                            <br/>
                            <img  class="w-25" id="newImg" src="{{asset('backend/assets/images/default.jpg')}}">
                            <br/>

                            <label class="form-label mt-2">Image Url</label>
                            <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" id="imageUrl" type="file" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button id="modal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button onclick="Save()" type="button" class="btn btn-primary">Create</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    async function Save(){
        let title=$('#title').val();
        let subTitle1=$('#subTitle1').val();
        let subTitle2=$('#subTitle2').val();
        let imageUrl=$('#imageUrl')[0].files[0];

        if(title.length===0){
            errorToast("Hero section title is Required!")
        }else if(subTitle1.length===0){
            errorToast("Hero section subtitle1 is Required!")
        }else if(subTitle2.length===0){
            errorToast("Hero section subtitle2 is Required!")
        }else if(!imageUrl){
            errorToast("Hero section Image is Required!")
        }else{
            $('#modal-close').click();

            let formData = new FormData();
            formData.append('title',title);
            formData.append('subTitle1',subTitle1);
            formData.append('subTitle2',subTitle2);
            formData.append('imageUrl',imageUrl);

            const config = {
                headers: {
                    'content-type':'multipart/form-data'
                }
            }

            showLoader();
            const res = await axios.post("/create-herosection",formData,config);
            hideLoader();
            console.log(res)
            if(res.status===201){
                successToast('Hero section created successful');
                $('#save-form').trigger('reset');
                await getList();
            }else{
                errorToast("Request fail!");
            }
        }
    }
</script>