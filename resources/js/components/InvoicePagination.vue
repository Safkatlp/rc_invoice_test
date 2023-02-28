<template>
	<div class="row">
		<div class="col-lg-12">
			<ul class="pagination">
				<!-- Prev Page Arrow -->
				<li class="page-item" v-if="pagination.current_page != 1" >
					<a class="page-link cursor-pointer" @click="gotoPage(pagination.prev_page_url)">
						<i class="fas fa-long-arrow-alt-left"></i>
					</a>
				</li>
				<!-- /Prev Page Arrow -->
				
				<span v-for="link in pagination.links.slice(1, pagination.links.length-1)" :key="link">
					<li class="page-item" @click="gotoPage(link.url)">
						<a class="page-link"  :class="link.active ? 'active' : 'cursor-pointer'">{{ link.label }}</a>
					</li>
				</span>
				
				
				<!-- Next Page Arrow -->
				<li class="page-item" title="Next" v-if="pagination.current_page != pagination.last_page">
					<a class="page-link cursor-pointer" @click="gotoPage(pagination.next_page_url)">
						<i class="fas fa-long-arrow-alt-right"></i>
					</a>
				</li>
				<!-- /Next Page Arrow -->
			</ul>
		</div>
	</div>
</template>

<script>
export default {
	name: "InvoicePagination",
	props: ['pagination'],
	data() {
		return {
			page: 1,
			pills: 0,
			dotsOne: false,
		}
	},
	created() {
		this.renderPagination();
	},
	beforeMount() {
		// alert(this.pagination);
		this.renderPagination();
	},
	mounted() {
		// console.log(this.pagination);
		this.renderPagination();
	},
	methods: {
		renderPagination() {
			// console.log("-----pagination", this.paginationObject)
		},
		gotoPage(url) {
			this.$emit("gotoPage", url);
		}
	}
}
</script>

<style scoped>

</style>