<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create To Do</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="todoTitle">
                                <label class="form-label">Description</label>
                                <textarea name="" id="todoDescription" cols="2" rows="5" class="form-control"></textarea>
                                <label class="form-label">Status</label>
                                <select type="text" class="form-control form-select" id="status">
                                    <option value="">Select Status</option>
                                    <option value="completed">Complete</option>
                                    <option value="incompleted">Incomplete</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>
    async function Save() {

        let todoTitle=document.getElementById('todoTitle').value;
        let todoDescription = document.getElementById('todoDescription').value;
        let status = document.getElementById('status').value;

        if (todoTitle.length === 0) {
            errorToast("Title Field Required !")
        }
        else if(todoDescription.length===0){
            errorToast("Description Field Required !")
        }
        else if(status.length===0){
            errorToast("Please Select A Status !")
        }
        else {

            document.getElementById('modal-close').click();

            let formData=new FormData();
            formData.append('title',todoTitle)
            formData.append('desc',todoDescription)
            formData.append('status',status)

            showLoader();
            let res = await axios.post("/create-todo",formData)
            hideLoader();

            if(res.status===201){
                successToast('Request completed');
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }
</script>
