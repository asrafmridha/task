<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update TODO</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Status</label>
                                <select type="text" class="form-control form-select" id="updatestatus">
                                    <option value="">Select Status</option>
                                    <option value="completed">Completed</option>
                                    <option value="incompleted">Incomplete</option>
                                </select>

                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="todoTitleUpdate">
                                <label class="form-label">Description</label>
                                <textarea name="" id="todoDescriptionUpdate" cols="2" rows="5" class="form-control"></textarea>
                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn btn-sm btn-success" >Update</button>
            </div>

        </div>
    </div>
</div>


<script>


    async function ToDoUpdateForm(id){

        document.getElementById('updateID').value=id;

        showLoader();
        let res=await axios.post("/todo-by-id",{id:id})
        hideLoader();

        document.getElementById('todoTitleUpdate').value=res.data['title'];
        document.getElementById('todoDescriptionUpdate').value=res.data['description'];
        document.getElementById('updatestatus').value=res.data['status'];
    }

    async function update() {

        let todoTitleUpdate=document.getElementById('todoTitleUpdate').value;
        let todoDescriptionUpdate = document.getElementById('todoDescriptionUpdate').value;
        let updatestatus = document.getElementById('updatestatus').value;
        let id = document.getElementById('updateID').value;

        if (todoTitleUpdate.length === 0) {
            errorToast("Title Field Required !")
        }
        else if(todoDescriptionUpdate.length===0){
            errorToast("Description Field Required !")
        }
        else if(updatestatus.length===0){
            errorToast("Please Select A Status !")
        }
        else {

            document.getElementById('update-modal-close').click();

            let formData=new FormData();

            formData.append('title',todoTitleUpdate)
            formData.append('desc',todoDescriptionUpdate)
            formData.append('status',updatestatus)
            formData.append('id',id)

            showLoader();
            let res = await axios.post("/update-todo",formData)
            hideLoader();

            if(res.status===200 && res.data===1){
                successToast('Request completed');
                document.getElementById("update-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }
</script>
