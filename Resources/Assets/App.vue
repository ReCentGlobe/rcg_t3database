<template>
  <h1>Hello World!</h1>
  <slot name="resultPageLabel"></slot>
  <h1 v-if="!projects">Loading</h1>
  <ul v-else>
    <li v-for="project in projects" :key="project.uid">
      {{ project.title }}
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      titleClass: 'title',
      projects: ''
    }
  },
  // component options
  async created() {
    // GET request using fetch with async/await
    const response = await fetch("https://typo3.stacks.run/en/test?" + new URLSearchParams({
      'tx_rcgprojectdb_projectlist_ajax[action]': 'List',
      'tx_rcgprojectdb_projectlist_ajax[controller]': 'JsonProject',
      type: 808
    }));
    const data = await response.json();
    this.projects = data.projects;
    console.log(this.projects);
  }
}

</script>