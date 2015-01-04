
var Content = React.createClass({displayName: "Content",
    getInitialState: function() {
        return {
            value: 'microCMS.Project'
        };
    },
    render: function() {
        return (
            React.createElement("h2", null, this.state.value)
        );
    }
});
React.renderComponent(
    React.createElement(Content, null),
    document.getElementById('title')
);
