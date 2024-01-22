<div class="modal" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                
                <input style="width:100%" class="d-none" id="deleteID"/><br/>
                <input style="width:100%" class="d-none" id="file_path"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="ItemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function ItemDelete(){
        let id = $('#deleteID').val();
        let file_path = $('#file_path').val();
        $('#delete-modal-close').click();
        showLoader();
        let res = await axios.post('/delete-herosection',{'id':id,'file_path':file_path});
        hideLoader();
        if(res.data===1){
            successToast("Request Complete");
            await getList();
        }else{
            errorToast("Request Fail!");
        }
    }
</script>