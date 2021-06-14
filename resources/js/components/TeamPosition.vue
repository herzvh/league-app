<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Team</th>
                <th>Played</th>
                <th>Lost</th>
                <th>Won</th>
                <th>Drawn</th>
                <th>Goals</th>
                <th>Goal diff</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(team, index) of positions">
                <td>
                    {{team.name}}
                </td>
                <td>
                    {{team.m_played}}
                </td>
                <td>
                    {{team.m_lost}}
                </td>
                <td>
                    {{team.m_won}}
                </td>
                <td>
                    {{team.m_drawn}}
                </td>
                <td>
                    {{team.goals}}
                </td>
                <td>
                    {{team.goal_diff}}
                </td>
                <td>
                    {{team.points}}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "TeamPosition",
    data() {
        return {
            positions: [],
        }
    },
    mounted() {
        this.getTeamPositions();
    },
    methods: {
        getTeamPositions() {
            this.axios.get('teams/positions').then((response) => {
                this.positions = response.data;
            })
                .catch((e) => {
                    console.error(e);
                })
        },
    },
}
</script>

<style scoped>

</style>
