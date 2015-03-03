var Users = new Mongo.collection("users");
var Questions = new Mongo.Collection("questions");
var Answers = new Mongo.Collection("answers");

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
      Meteor.call("setBest", this._id);
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
        asker: Meteor.userId(),
        title: title,
        content: content,
        bestAnswer: null,
        timestamp: new Date()
    });
  },
  addAnswer: function(title, content, question) {
    if (! Meteor.userId()) {
      throw new Meteor.Error("not0authorized");
    }

    Answers.insert({
      answerer: Meteor.userId(),
      questionId: question.id(),
      title: title,
      content: content,
      best: false,
      value: 0,
      voters: {},
      timestamp: new Date()
    });
  },
  setBest: function (answerId) {
    var answer = Answers.findOne(answerId);
    var question = Questions.findOne(answer.question)

    if (question.asker !== Meteor.userId()) {
      throw new Meteor.Error("not-authorized");
    }

    if(question.bestAnswer === null) {

      // If this is the first best answer

      Answers.update(answerId, { $set: { best: true} });
      Questions.update(answer.question, { $set: {bestAnswer: answerId} })

    } else if(question.bestAnswer === answerId) {

      // if this is already set as best, de-set it

      Answers.update(answerId, { $set: { best: false} });
      Questions.update(answer.question, { $set: {bestAnswer: null} })

    } else {

      // if another answer is selected, select this one instead

      Answers.update(question.bestAnswer, { $set: {best: false} });
      Answers.update(answerId, { $set: {best: true} });
    }
  },
  upVote: function (answerId) {
    var answer = Answers.findOne(answerId);

    // users can't vote on their own answer
    if (answer.answerer === Meteor.userId()) {
      throw new Meteor.Error("not-authorized");
    }

    // Did you already vote?
    if(Meteor.userId() in answer.voters) {
      // Yes you did

      if(answer.voters.userId() == true) {
        // retract vote

        answer.value -= 1;

        Answers.update(answerId, { $set: {value: answer.value}, $unset: {voters[Meteor.userId()]: ""} })

      } else {
        // change vote

        answer.value += 2;

        Answers.update(answerId, { $set: {value: answer.value}, $set: {voters[Meteor.userId()]: true} });
      }
    } else {
      // No you didn't
      answer.value += 1;
      Answers.update(answerId, { $set: {value: answer.value}, $set {voters[Meteor.userId()]: true} })
    }
  },
  downVote: function (answerId) {
    var answer = Answers.findOne(answerId);

    // users can't vote on their own answer
    if (answer.answerer === Meteor.userId()) {
      throw new Meteor.Error("not-authorized");
    }

    // Did you already vote?
    if(Meteor.userId() in answer.voters) {
      // Yes you did

      if(answer.voters.userId() == false) {
        // retract vote

        answer.value += 1;

        Answers.update(answerId, { $set: {value: answer.value}, $unset: {voters[Meteor.userId()]: ""} })

      } else {
        // change vote

        answer.value -= 2;

        Answers.update(answerId, { $set: {value: answer.value}, $set: {voters[Meteor.userId()]: false} });
      }
    } else {
      // No you didn't
      answer.value -= 1;
      Answers.update(answerId, { $set: {value: answer.value}, $set {voters[Meteor.userId()]: false} })
    }
  }
});

if (Meteor.isServer) {
  // Server side computation

}