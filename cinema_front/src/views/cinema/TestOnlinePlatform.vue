<template>
  <div>
    <Header />
    <ArrowBack id="arrow_back"/>
    <p>Тест онлайн кинотеатр</p>
    <Footer />

  </div>
</template>

<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ArrowBack from "../../components/ArrowBack";
export default {
  name: "Test",
  components: {
    Header,
    Footer,
    ArrowBack
  }
}
</script>

<style scoped>
  p{
    font-size: 25px;
    padding: 50px;
    color:white;
    text-align: center;
  }
  #arrow_back{
    position: relative;
  }
</style>