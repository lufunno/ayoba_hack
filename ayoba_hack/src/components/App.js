import React, {Component} from 'react';

class App extends Component {
    constructor(props){
        super(props);
    }

    render() {
        if(this.state.page == "home"){
            var displayResult = <Home />;
        } else  if(this.state.page == 'Ambulance'){
            var displayResult = <Ambulance />;
        } else  if(this.state.page == 'Blood'){
            var displayResult = <Blood />;
        }
        return (
            <div>
                { displayResult }
            </div>
        )
    }
}

export  default App;