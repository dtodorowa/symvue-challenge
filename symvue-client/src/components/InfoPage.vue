<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="bg-indigo-600">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
      <h2 class="text-3xl tracking-tight font-bold text-white">First Steps</h2>
      <div class="mt-6 border-t border-indigo-300 border-opacity-25 pt-10">
        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-12">
       <div>
          <dt class="text-lg leading-6 font-medium text-white">
             Viweing policies
            </dt>
            <dd class="mt-2 text-base text-indigo-200">
             <a href="/policies"> Go to view policies</a>
            </dd>
       </div>

       <div>
          <dt class="text-lg leading-6 font-medium text-white">
             Adding a policy
            </dt>
            <dd class="mt-2 text-base text-indigo-200">
              <a href="/add-policy"> Go add a new policy</a>
            </dd>
       </div>

       <div>
          <dt class="text-lg leading-6 font-medium text-white">
             faq.question
            </dt>
            <dd class="mt-2 text-base text-indigo-200">
              faq.answer 
              <a href="/add-policy">Add</a>
            </dd>
       </div>
          
        </dl>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>