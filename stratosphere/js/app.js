App = Ember.Application.create();

/*
App.Store = Ember.Store.extend({

    adapter : DS.RESTAdapter.extend({
        url : 'http://localhost:1337'
    })
});
*/

App.IndexController = Ember.Controller.extend({
    loginFailed: false,
    isProcessing: false,
    isSlowConnection: false,
    timeout: null,

   login: function(){
       this.setProperties({
           loginFailed: false,
           isProcessing: true
       });

       this.set("timeout", setTimeout(this.slowConnection.bind(this), 3000));

       $.post("http://localhost:1337",{
        username: this.get("unsername"),
        password: this.get("password")
       }).then(function(){
        this.set("isProcessing", false);
        document.location = "/welcome";
       }.bind(this), function(){
           this.set("isProcessing", false);
           this.set("loginFailed", true);
       }.bind(this));
   }
});

App.Router.map(function() {
  // put your routes here
});

App.IndexRoute = Ember.Route.extend({
  model: function() {
    return ['red', 'yellow', 'blue'];
  }
});
