<template>
    <div>
        <expandable-image :src="'/images/'+image.image" class="img-fluid"/>
        <div class="title">
            {{ image.title }}
        </div>
        <div class="description">
            {{ image.description }}
        </div>
        <div class="mt-3" v-if="image.user != null">
            Author: {{ image.user.name }}
        </div>
        <div class="allow-button approved" v-if="approve">
            Approved
        </div>
        <div class="allow-button" @click="approveImage(image.id)" v-else>
            Allow
        </div>
    </div>
</template>

<script>
export default {
    name: "ImageApprove",
    props: ['image'],
    data() {
        return {
            approve: false
        }
    },
    methods: {
        approveImage(id) {
            if (!this.approve) {
                axios.post('/admin/' + id + '/approve').then(() => {
                    this.approve = true;
                })

            }
        }
    }
}
</script>

<style scoped>
.allow-button {
    max-width: 100%;
    height: 40px;
    border: 1px solid #C4C4C4;
    border-radius: 5px;
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    color: #515151;
    text-transform: uppercase;
    margin-top: 26px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.approved {
    color: green !important;
}
</style>
