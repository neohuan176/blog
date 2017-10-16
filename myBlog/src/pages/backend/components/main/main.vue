<template>
<div>
    <Carousel autoplay v-model="value2">
        <CarouselItem>
            <div class="demo-carousel">1</div>
        </CarouselItem>
        <CarouselItem>
            <div class="demo-carousel">2</div>
        </CarouselItem>
        <CarouselItem>
            <div class="demo-carousel">3</div>
        </CarouselItem>
        <CarouselItem>
            <div class="demo-carousel"></div>
        </CarouselItem>
    </Carousel>
    <div style="background:red;width:100px;height:10000px;"></div>
</div>
</template>
<script>
    export default {
        data () {
            return {
                value2: 0
            }
        }
    }
</script>
