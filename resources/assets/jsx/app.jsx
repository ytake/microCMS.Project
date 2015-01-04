
var Content = React.createClass({
    getInitialState: function() {
        return {
            value: 'microCMS.Project'
        };
    },
    render: function() {
        return (
            <h2>{this.state.value}</h2>
        );
    }
});
React.renderComponent(
    <Content />,
    document.getElementById('title')
);
