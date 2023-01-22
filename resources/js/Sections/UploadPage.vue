<template>
    <div class="container text-center">
        <div class="main">
            <form id="upload-form" enctype="multipart/form-data" method="post">
                <div class="header">
                    UPLOAD YOUR IMAGE
                </div>

                <div class="upload">
                    <div class="upload-header">upload image</div>
                    <img v-if="imageUrl != ''" :src="imageUrl" class="img-fluid">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01" @change="uploadImage">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="title">
                    <div>title</div>
                    <input type="text" placeholder="image title" class="form-control" name="title">

                </div>
                <div class="description">
                    <div>description</div>
                    <input type="text" placeholder="image description" class="form-control" name="description">

                </div>
                <button type="button" class="main-button" @click.prevent="upload">upload</button>
                <div class="text-danger mt-3" v-if="errors != ''">{{ errors }}</div>

            </form>

        </div>
    </div>
</template>

<script>
export default {
    name: "UploadPage",
    data() {
        return {
            image: '',
            imageUrl: '',
            errors: '',
        }
    },
    methods: {
        uploadImage(e) {
            const file = e.target.files[0]
            this.image = file
            this.imageUrl = URL.createObjectURL(file)
        },
        upload() {
            let formData = new FormData(document.getElementById('upload-form'));
            formData.append('image', this.image);
            axios.post('/upload', formData).then(() => {
                window.location.reload();
            }).catch(e => {
                this.errors = e.response.data.errors.description[0];
                this.errors = e.response.data.errors.title[0];
                this.errors = e.response.data.errors.image[0];
            })
        }

    }
}
</script>

<style scoped>
.container {
    color: #000000;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container .header {
    font-weight: 700;
    font-size: 34px;
    line-height: 40px;
    margin-bottom: 48px;
}


.main .upload {
    margin-top: 80px;
}

.main .upload img {
    width: 149px;
    height: 154px;
    margin-bottom: 18px;
}

.main .upload .upload-header {
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.main .upload .custom-file-input {
    width: 368px !important;
    height: 55px !important;

    background: #C4C4C4;
    border: 1px solid #C4C4C4;
}

.main .title {
    margin-top: 20px;
}

.main .title div {
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    text-transform: uppercase;
}

.form-control {
    font-weight: 700;
    font-size: 12px;
    line-height: 14px;
    text-transform: uppercase;
    width: 368px;
    height: 55px;
    color: #C4C4C4;
    border: 1px solid #C4C4C4;
    background-color: white;
    margin-top: 10px;
}


input[type="text"]::placeholder {
    text-align: center;
}

.main .description {
    margin-top: 10px;
}

.main .description div {
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    text-transform: uppercase;

}

.main .main-button {
    width: 368px;
    height: 69px;
    background: #515151;
    border-radius: 500px;
    margin-top: 35px;
    font-weight: 700;
    font-size: 18px;
    line-height: 21px;
    color: white;
    text-transform: uppercase;
}


</style>
