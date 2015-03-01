Questions = new Mongo.Collection("questions");
Answers = new Mongo.Collection("answers");

if (Meteor.isClient) {
  // Client side computation
  Meteor.subscribe("questions");
  Meteor.subscribe("answers");

  Template.body.events({
    "submit .new-question": function (event) {
      
      var text = event.target.text.value;

      Meteor.call("addQuestion", text);

      // Clear form
      event.target.text.value = "";

      // Prevent default form submit
      return false;
    }
  });

  Template.question.events({
    "submit .new-answer": function (event) {
      
      var text = event.target.text.value;

      Meteor.call("addAnswer", text);

      // Clear form
      event.target.text.value = "";

      // Prevent default form submit
      return false;
    },
    "click .up-vote": function () {
      Meteor.call("upVote", this._id);
    },
    "click .down-vote": function () {
      Meteor.call("downVote", this._id);
    }
  });

  Template.answer.events({
    "click .toggle-best": function () {
      // Set the checked property to the opposite of its current value
      Meteor.call("setBest", this._id, ! this.best);
    },
    "click .up-vote": function () {
      Meteor.call("upVote", this._id);
    },
    "click .down-vote": function () {
      Meteor.call("downVote", this._id);
    }
  });

  Accounts.ui.config({
    passwordSignupFields: "USERNAME_ONLY"
  });
}

Meteor.methods({
  addQuastion: function(title, content) {
    if (! Meteor.userId()) {
      throw new Meteor.Error("not-authorized");
    }
    
    Questions.insert({
        asker: Meteor.userId(), //or Meteor.user().username ??
        title: title,
        content: content,
        bestAnswer: null,
        timestamp: new Date()
    });
  },
  setBest: function (answerId, setBest) {
    var answer = Answers.findOne(answerId);
      
    if (question.asker !== Meteor.userId()) {
      throw new Meteor.Error("not-authorized");
    }

    Answers.update(answerId, { $set: { best: setBest} });
  },
});

if (Meteor.isServer) {
  // Server side computation
  
}