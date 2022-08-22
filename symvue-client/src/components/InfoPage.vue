<!-- This example requires Tailwind CSS v2.0+ -->
<template>
	<div class="bg-indigo-600">
		<div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
			<h2 class="text-3xl tracking-tight font-bold text-white">First Steps and Information</h2>
			<div class="mt-6 border-t border-indigo-300 border-opacity-25 pt-10">
				<dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-12">
					<div>
						<dt class="text-lg leading-6 font-medium text-white">
							Main Functionality
						</dt>
						<dd class="underline mt-2 text-base text-indigo-200">
							<a href="/policies" class="">View all policies </a><br>
							<a href="/add-policy">Add a new policy</a>
						</dd>
					</div>

				
					<div>
						<dt class="text-lg leading-6 font-medium text-white">
							Things I used
						</dt>
						<dd class="mt-2 text-base text-indigo-200">
							TailwindCSS to style the components <br>
							Axios to fetch data from the server
						</dd>
					</div>

					<div>
						<dt class="text-lg leading-6 font-medium text-white">
							Things I learned
						</dt>
						<dd class="mt-2 text-base text-indigo-200">
							<b>PHP</b> Symfony, Controllers, Doctrine (ORM), Entities, Using the entity maker tool, serialization in php<br>
							<b>Vue</b> how components work in Vue (I come from a React background), routing, string interpolation, data binding, list rendering, conditional rendering, event handling, computed properties, reactivity (ref), 
						</dd>
					</div>

					<div>
						<dt class="text-lg leading-6 font-medium text-white">
							Things I wanted to do better 
						</dt>
						<dd class="mt-2 text-base text-indigo-200">
							<b>Modularity</b> I could've broken down the pages into smaller components but since maintaincence and collaboration are not the main concern, I left the components relatively large.<br/>
							<b>Programatic Routing</b> I could not get programatic routing to work on form submission, so the user has to manually navigate back when adding and editing a policy. Bad practice. I will focus on learning how to do it this week. <br>
							<b>Security</b> since the app allows user input, it is very important to validate and sanitize all input but I did not focus on it as much as I normally would.
						</dd>
					</div>
				</dl>
			</div>
		</div>
	</div>
</template>

<script></script>
