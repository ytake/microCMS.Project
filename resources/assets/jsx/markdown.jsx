var converter = new Showdown.converter();

var MarkdownEditor = React.createClass({
    getInitialState: function () {
        return {
            value: 'Type some *markdown* here!'
        };
    },
    handleChange: function () {
        this.setState({
            value: this.refs.textarea.getDOMNode().value
        });
    },
    render: function () {
        return (
            <div className="MarkdownEditor">
                <h3>Input</h3>
                <textarea
                    rows="20"
                    className="small-12 columns"
                    onChange={this.handleChange}
                    ref="textarea"
                    defaultValue={this.state.value} />
                <h3>Output</h3>
                <div
                    className="content"
                    dangerouslySetInnerHTML={{
                        __html: converter.makeHtml(this.state.value)
                    }}
                />
            </div>
        );
    }
});

React.renderComponent(
    MarkdownEditor({}),
    document.querySelector(".markdown")
);
