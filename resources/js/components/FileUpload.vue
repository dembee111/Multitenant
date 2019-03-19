<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                       
                            <legend>Upload form</legend>
                            <div class="form-group">
                                <label>Upload files</label>
                                <input type="file" id="upload-file" multiple class="form-control" @change="fieldChange">
                            </div>
                            <button class="btn btn-primary" @click="uploadFile">Submit</button>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                attachments:[],
                form: new FormData,
                formAciont:null
            }
        },
        methods:{
            fieldChange(e){
                
                this.formAction = e.target.formAction;
              
                let selectedFiles=e.target.files;
                if (!selectedFiles.length) {
                    return false;
                }

                for(let i=0; i<selectedFiles.length; i++) {

                    this.attachments.push(selectedFiles[i]);
                }

                console.log(this.attachments);
            },
            uploadFile(){
               
                for(let i=0; i<this.attachments.length; i++){

                    this.form.append('pics[]', this.attachments[i]);
                }
                

                const config = {headers: {'Content-Type': 'multipart/form-data'} };
                document.getElementById('upload-file').value=[];
                axios.post(this.formAction, this.form,config).then(response=>{
                    //success
                    console.log(response);
                }).catch(response=>{

                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
