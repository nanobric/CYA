import React from 'react';
import $ from 'jquery';
import SelectField from 'material-ui/lib/select-field';
import MenuItem from 'material-ui/lib/menus/menu-item';

var SelectFieldPais = React.createClass({
    getInitialState: function () {
        return {data: [], value: "CO"};
    },

    handleChange: function (event, index, value) {
        this.setState({value: value});
    },

    componentDidMount: function () {
        let array = [];
        $.ajax({
            url: this.props.source,
            dataType: 'json',
            cache: false,
            context: this,
            success: function(data) {
                data.map(function (country) {
                    array.push(<MenuItem key={country.code} value={country.code} primaryText={country.name}/>);
                });
                this.setState({data: array});
            }.bind(this),
            error: function(xhr, status, err) {
                //console.log(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    render: function () {
        return (
            <SelectField value={this.state.value} onChange={this.handleChange}  floatingLabelText="Pais" autoWidth={true}>
                { this.state.data }
            </SelectField>
        );
    }
});

export default SelectFieldPais;
