<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="bread">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }" class="text-warning"
                        >Home</router-link
                    >
                </li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</template>

<script>
export default {
    components: {}
};
</script>

<style scoped>
.bread {
    margin-top: 90px;
    margin-left: -10px;
}
</style>
